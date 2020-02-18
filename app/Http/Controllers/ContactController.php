<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;
use App\Contact;
use App\Info;

class ContactController extends BasePrivatController
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:150'],
            'mail' => ['required', 'string', 'max:150'],
            'text' => 'string|max:1500|nullable',
            'links' => 'string|max:1500|nullable'
        ]);
    }
    /**
     * SET the specified resource in model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     */
    protected function setRequestToModel(Request $request,Contact $contact)
    {
            $contact->company = $request->input('company');
            $contact->city = $request->input('city');
            $contact->phone = $request->input('phone');
            $contact->mail = $request->input('mail');
            $contact->text = $request->input('text');
            $contact->links = $request->input('links');
            $contact->show = (boolean)$request->input('show');
            $contact->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = null;
        $contactsUser = Contact::whereDate('created_at', '>=', Carbon::now()->subMonth())->where('deleted',0)
            ->where('show',1)
            ->where('user_id',Auth::user()->getAuthIdentifier())
            ->get();
        $infosUser = Info::whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->where('show',1)
            ->where('user_id',Auth::user()->getAuthIdentifier())
            ->get();
        if(count($contactsUser) OR count($infosUser)){
            $contacts = Contact::where('deleted',0)->get();
        }else{
            $contacts = Contact::where('deleted',0)->where('user_id',Auth::user()->getAuthIdentifier())->get();
        }
        return view('model.contact.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contact = new Contact();
        return view('model.contact.create', [
            'contact' => $contact
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $contact = new Contact();
        $contact = $contact->create();

        if(!is_null($contact)){
            $contact->user_id = Auth::user()->getAuthIdentifier();
            $this->setRequestToModel($request,$contact);
        }

        return redirect()->route('contactShow', $contact->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::where('id',$id)->get()->first();
        $infos = Info::where('contact_id',$id)->get();
        return view('model.contact.show', [
            'contact' => $contact,
            'infos' => $infos
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();
        return view('model.contact.edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $contact = Contact::where('user_id',Auth::user()->getAuthIdentifier())
            ->where('id',$id)->get()->first();

        if(!is_null($contact)){
            $this->setRequestToModel($request,$contact);
        }
        return redirect()->route('contactShow', $contact->id);
    }


}
