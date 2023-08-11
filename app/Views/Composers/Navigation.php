<?php

namespace App\Views\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chats;
use App\Models\Notifications;
use Webklex\IMAP\Facades\Client;

class Navigation {
    
    /**
     * Create a new user controller instance.
     * 
     * @var Illuminate\Support\Collection
     */
	protected $notify;

    /**
     * Create a new auth composer.
     *
     * @param  Request $request
     * @return void
     */
    public function __construct(Request $request) {
        // Dependencies automatically resolved by service container...
		$id = $request->user()->id;
		$this->notify = array();
		$this->notify['all'] = Notifications::where('recipient_id', $id)->where('status', 'sent')->count();
		$this->notify['new_quot'] = Notifications::where('recipient_id', $id)
			->where('status', 'sent')->where('kind', 'new')->where('taget', 'Quotation')->count();
		$this->notify['new'] = Notifications::where('recipient_id', $id)
			->where('status', 'sent')->where('kind', 'new')->where('taget', 'Policy')->count();
		$this->notify['expired'] = Notifications::where('recipient_id', $id)
			->where('status', 'sent')->where('kind', 'expired')->where('taget', 'Policy')->count();
		$this->notify['canceled'] = Notifications::where('recipient_id', $id)
			->where('status', 'sent')->where('kind', 'canceled')->where('taget', 'Policy')->count();
		//$this->notify['chat'] = Chats::where('recipient_id', $id)->where('status', '!=', 'seen')->count();
		
		$oClient = Client::account('default');
		$oClient->connect();
		$folder = $oClient->getFolder('INBOX');
		$user = User::where('is_verified', '1')->get();

		$aMessage = $folder->query()->unseen()->setFetchFlags(false)->setFetchBody(false)->get();
		$i = 0;
		
		foreach($aMessage as $oMessage){
			$mesag_data['from'] = $oMessage->getFrom()[0]->mail;
			foreach($user as $email){
				if ($mesag_data['from'] == (string)$email->email) {
					$i += 1;
				}
			}
		} 
		$this->notify['mail'] = $i;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $view->with('notify', $this->notify);
    }
}