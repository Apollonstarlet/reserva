<?php

namespace App\Import;

use DB;
use App\Models\User;
use App\Models\Quotations;
use App\Models\Policies;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToArray;

class ImportData implements ToArray
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }
    public function array(array $rows)
    {
		$id = 0;
        foreach ($rows as $row) {
			$id = $id + 1;
			if($id == 1)
				continue;
			if (!filter_var($row[26], FILTER_VALIDATE_EMAIL)) {
				continue;
			}
			$mailFlag = $this->flag('users', 'email', $row[26]);
			$phoneFlag = $this->flag('users', 'phone', $row[25]);
			
            $name = $this->getName($row[15]);
			if ( filter_var($row[21], FILTER_VALIDATE_INT) === false ) {
				$store = $row[20];
				$row[20] = $row[21];
				$row[21] = $store;
			}
			
			if($mailFlag < 1){
				$user = new User();
				$user->firstname   = $name[0];
				$user->lastname    = $name[1];
				$user->paternal_surname    = $name[2];
				$user->maternal_surname    = $name[3];
				$user->rfc         = $row[17];
				$user->email       = $row[26];
				$user->password    = Hash::make('12345678');
				$user->address     = $row[18];
				$user->phone       = $row[25];
				$user->telephone   = $row[24];
				$user->postal_code = $row[21];
				$user->role        = 'client';
				$user->verification_code = sha1($row[26]);
				$user->is_verified = 1;
				$user->save();
			}
			
			$cve = preg_replace('/[^a-z]/i', '', $row[1]);
			$pol = preg_replace('/[^0-9]/', '', $row[1]);
			$quotFlag = $this->flag('quotations', 'cot_id', $pol);
			if($quotFlag < 1){
				$user_id = $this->getId('users', 'email', $row[26]);
				$fp = $this->get_fp($row[11]);
				$paq = $this->get_paq($row[35]);
				$quotations = new Quotations();
				$quotations->cot_id      = trim($pol);
				$quotations->user_id     = $user_id;
				$quotations->colonia  = $row[19];
				$quotations->municipality  = $row[20];
				$quotations->marca       = $row[30];
				$quotations->model        = $row[29];
				$quotations->description = $row[31];
				$quotations->fp     = $fp;
				$quotations->paq         = $paq;
				$quotations->condition   = '1';
				$quotations->DER         = $row[37] != '#N/A' ? $row[37] : 0;
				$quotations->iva         = $row[38] != '#N/A' ? $row[38] : 0;
				$quotations->pneta       = $row[36] != '#N/A' ? $row[36] : 0;
				$quotations->ptotal      = $row[39] != '#N/A' ? $row[39] : 0;
				$quotations->company      = $row[46];
				$quotations->start_date  = $this->getDate($row[2]);
			    $quotations->end_date    = $this->getDate($row[3]);
				$quotations->save();
			}
			
			$policyFlag = $this->flag('policies', 'pol', $pol);
			if($policyFlag < 1){
				$quot_id = $this->getId('quotations', 'cot_id', $pol);
				$policies = new Policies();
				$policies->quot_id  = $quot_id;
				$policies->cve      = $cve;
				$policies->pol      = trim($pol);
				$policies->serie    = $row[34];
				$policies->motor    = $row[33];
				$policies->plates   = $row[32];
				$policies->reference = $row[42];
				$policies->owner = $row[16];
				$policies->issuer = $row[6];
				$policies->ASEGID = $row[5];
				$status = 1;
				if($row[7] == 'CANCELADA')
					$status = 0;
				$policies->status   = trim($status);
				if($status == 0){
					$end_date = $this->getDate($row[9]);
					$policies->cancel_date = $end_date;
				}
				$policies->save();
			}
        }
    }

    public function getArray(): array
    {
        return $this->data;
    }
	
	public function getName($data)
	{
		$name = explode(" ", $data);
		if (is_null($data)){
			$name = array();
			$name[0] = "Firstname";
			$name[1] = "Lastname";
			$name[2] = $name[3] = null;
		} else{
			$count = count($name);
			if ($count < 2)
				$name[1] = "Lastname";
			if ($count < 3)
				$name[2] = null;
			if ($count < 4)
				$name[3] = null;
		}
		return $name;
	}
	
	public function flag($table, $item, $data)
	{
		$find = DB::table($table)->where($item, $data)->get();
		return count($find);
	}
	
	public function getDate($data)
	{
		if(gettype($data) == 'integer'){
			$UNIX_DATE = ($data - 25569) * 86400;
			$date= gmdate("Y-m-d H:i:s", $UNIX_DATE);
		} else{
			$date= null;
		}
		return $date;
	}
	
	public function getId($table, $item, $data)
	{
		$find = DB::table($table)->where($item, $data)->first();
		return $find->id;
	}
	
	public function get_fp($data)
	{
		if (substr_count($data,"MENSUAL") == 1){
			$result = '27';
		} elseif(substr_count($data,"SEMESTRAL") == 1){
			$result = '28';
		} elseif(substr_count($data,"TRIMESTRAL") == 1){
			$result = '29';
		} elseif(substr_count($data,"QUINCENAL") == 1){
			$result = '25';
		} else{
			$result = '12';
		} 
		return $result;
	}
	
	public function get_paq($data)
	{
		if (substr_count($data,"AMPLIA") == 1){
			$result = '3';
		} elseif (substr_count($data,"Limitado") == 1){
			$result = '2';
		} elseif (substr_count($data,"INTEGRAL") == 1){
			$result = '460';
		} else{
			$result = '1';
		}
		return $result;
	}
}