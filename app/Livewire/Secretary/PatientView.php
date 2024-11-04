<?php

namespace App\Livewire\Secretary;

use App\Models\appointment;
use App\Models\Patient;
use App\Models\PatientAttachment;
use Filament\Forms\Components\FileUpload;
use Livewire\Component;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;
// use Livewire\Component;

class PatientView extends Component implements HasForms
{
    use WithFileUploads;
    use InteractsWithForms;
    public $upload = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
              FileUpload::make('upload')->label('')
            ]);
            
    }

    public $patient_id;

    public function mount(){
        $this->patient_id = request('id');
    }

    public function uploadForm(){
        $this->validate([
            'upload' => 'required',
        ]);

        
        foreach ($this->upload as $key => $value) {
            PatientAttachment::create([
                'patient_id' => $this->patient_id,
                'attachment_path' => $value->store('Attachment', 'public'),
            ]);
        }

        if (auth()->user()->user_type == 'admin') {
           return redirect()->route('admin.patient-view', ['id' => $this->patient_id]);
        }else{
            return redirect()->route('secretary.patient-view', ['id' => $this->patient_id]);
        }
    }

    public function render()
    {
        return view('livewire.secretary.patient-view',[
            'patient' => Patient::where('id', $this->patient_id)->first(),
            'appointments' => appointment::where('patient_id', $this->patient_id)->where('status', 'approved')->get(),
            'attachments' => PatientAttachment::where('patient_id', $this->patient_id)->get(),
        ]);
    }
}
