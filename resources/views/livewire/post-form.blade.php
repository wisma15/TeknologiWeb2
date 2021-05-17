<div>
    <label>Title</label>
    <input wire:model="title" type="title" class="form-control"/>
    @if ($errors->has('title'))
        <p style="color: red">
            {{$errors->first('title')}}
        </p>
    @endif

    <label>Content</label>
    <textarea wire:model="content" type="title" class="form-control"/></textarea>
    @if ($errors->has('content'))
        <p style="color: red">
            {{$errors->first('content')}}
        </p>
    @endif
    <br/>

    <button wire:click="save" type="button" class="btn btn-primary">Save</button>

</div>
