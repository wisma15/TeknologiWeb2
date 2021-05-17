<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use finfo;

class PostForm extends Component
{
    public $title;
    public $content;
    public $modelId;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = Post::find($this->modelId);
        
        $this->title = $model->title;
        $this->content = $model->content;
    }

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required',
    ];


    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ];

        if ($this->modelId){
            Post::find($this->modelId)->update($data);
        }else{
            Post::create($data);
        }

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->clearVars();
        
    }

    private function clearVars()
    {
        $this->modelId = null;
        $this->title = null;
        $this->content = null;
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
