<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public $action;
    public $selectedItem;

    protected $paginationTheme = 'bootstrap';
    protected $listener = [
        'refreshParent' => '$refresh'
    ];

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        if ($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal'); 
        }else{
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal'); 
        }
    }

    public function delete()
    {
        Post::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal'); 
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::where('user_id', '=', auth()->user()->id)->paginate(3)
        ]); 
    }
}
