<?php

namespace App\Http\Controllers;

use App\Models\AllowedDomains;
use App\Models\Forms;
use App\Models\Questions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use Symfony\Component\Console\Question\Question;

class FormController extends Controller
{
    public function createForm(Request $request)
    {

        // kurang alpha numeric
        $validatedData = Validator::make($request->all(), [
            "name" => "required",
            "slug" => "required|unique:forms,slug",
            "allowed_domain" => "array"
        ]);

        if ($validatedData->fails()) {
            return response()->json(["message" => "Invalid Field", "errors" => $validatedData->errors()], 422);
        }
        $form = Forms::create($validatedData->validate() + ['creator_id' => $request->user()->id, 'description' => $request->description, 'limit_one_response' => $request->limit_one_response]);


        foreach ($request->allowed_domains as $domain) {
            AllowedDomains::create(["domain" => $domain, "form_id" => $form->id]);
        }

        // kurang response suksesnya dicek lagi
        return response()->json(["message" => "Create form success", "form" => $request->all()]);
    }

    public function getAllForms(Request $request)
    {
        $forms = Forms::all();
        return response()->json(['message' => "Get all forms success", 'forms' => $forms]);
    }

    public function getFormDetail(Request $request, $slug)
    {
        $form = Forms::with('questions')->where('slug', $slug)->first()->toArray();
        if (!$form) {
            return response()->json(["message" => "Form not found"], 404);
        }

        $domains = AllowedDomains::where('form_id', $form['id'])->get(['domain'])->toArray();
        $userDomain =  explode('@', $request->user()->email)[1];

        // cek nanti apakah dia boleh atau ngga

        // if (!in_array($userDomain, $domains)) {
        //     return response()->json(["message" => "Forbidden Access"], 403);
        // }
        // hilangin domain {}
        return response()->json(['message' => 'Get form success', 'form' => array_merge($form, ['allowed_domains' => $domains])]);
    }

    public function createQuestions(Request $request, $slug)
    {
        $form = Forms::with('questions')->where('slug', $slug)->first();
        if (!$form) {
            return response()->json(["message" => "Form not found"], 404);
        }
        if ($request->user()->id != $form->creator_id) {
            return response()->json(["message" => "Forbidden Access"], 403);
        }
        $form = $form->toArray();

        $validatedData = Validator::make($request->all(), [
            "name" => "required",
            "choice_type" => "required|in:short answer,paragraph,date,multiple choice,dropdown,checkboxes",
            "choices" => Rule::requiredIf(fn () => $request->choice_type == 'multiple choice' || $request->choice_type == 'dropdown' || $request->choice_type == 'checkboxes')
        ]);

        $isRequire = $request->is_required;

        if ($request->is_required == true) {
            $request->is_required = 1;
        } else {
            $request->is_required = 0;
        }

        if ($validatedData->fails()) {
            return response()->json(["message" => "Invalid Field", "errors" => $validatedData->errors()], 422);
        }

        $questions = Questions::create(array_merge($validatedData->validate(), ["choices" => implode(',', $request->choices)]) + ["is_required" => $request->is_required, "form_id" => $form['id']]);

        return response()->json(["message" => "Add question success", "form" => array_merge($validatedData->validate(), ["choices" => implode(',', $request->choices)]) + ["is_required" => $isRequire, "form_id" => $form['id'], "id" => $questions->id]]);
    }
    public function removeQuestion(Request $request, $slug, $id)
    {
        $form = Forms::with('questions')->where('slug', $slug)->first();
        if (!$form) {
            return response()->json(["message" => "Form not found"], 404);
        }

        $question = Questions::find($id);
        if (!$question) {
            return response()->json(["message" => "Question not found"], 404);
        }

        if ($request->user()->id != $form->creator_id) {
            return response()->json(["message" => "Forbidden Access"], 403);
        }
        $question->delete();
        return response()->json(["message" => "Remove question success"]);
    }
}
