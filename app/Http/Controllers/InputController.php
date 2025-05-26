<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputRequest;
use App\Services\InputService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class InputController extends Controller
{
    public function __construct(
        protected InputService $inputService
    ) {}

    public function showFormInput(): View
    {
        return view('home');
    }

    public function processInput(InputRequest $request)
    {
        $inputData = $request->getInputData();
        //Service aqui
        return $this->systemResult($inputData);
    }

    private function systemResult($inputData)
    {
        try {
            $result = $this->inputService->processInput($inputData);
            return redirect()->route('emailPreview')->with('process', $result);
        } catch (\RuntimeException $e) {
            return redirect()->back()->withErrors([
                'error' => 'Erro no processo dos dados cadastrados no formulário: ' . $e->getMessage(),
            ]);
        }
    }
}
