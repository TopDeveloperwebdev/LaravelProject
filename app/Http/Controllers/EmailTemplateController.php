<?php

namespace App\Http\Controllers;

use App\EmailTemplates as Template;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
   public function index()
   {
        $templates = Template::where('user_id', auth()->user()->id)->get();
        return view('admin.email-templates.index', compact('templates'));
   }

   public function create()
   {
       return view('admin.email-templates.create');
   }

   public function store(Request $request)
   {
       Template::create([
            'user_id' => auth()->user()->id,
            'order_id' => null,
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'file' => null,
       ]);

       return redirect('email-templates');
   }

   public function edit($id)
   {
       $item = Template::where('id', $id)->first();
       return view('admin.email-templates.edit', compact('item'));
   }

   public function update($id, Request $request)
   {
        $item = Template::where('id', $id)->first();
        $item->name = $request->name;
        $item->subject = $request->subject;
        $item->content = $request->content;
        $item->update();
        return redirect('email-templates');
   }
}
