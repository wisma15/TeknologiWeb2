<div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
        Tambah Post
    </button>

    <div class="mt-3">
        @if ($posts->count())
            <table class="table">
                <thead class="table-dark">
                    <th>Title</th>
                    <th>Description </th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" wire:click="selectItem({{$item->id}}, 'update')">Edit</button>
                                <button class="btn btn-danger btn-sm" wire:click="selectItem({{$item->id}}, 'delete')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}
        @endif

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Simpan Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('post-form')
                </div>
            </div> 
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalFormDeletePost" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormDeletePost">Hapus Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>
                        Apakah Ingin menghapus?
                    </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button wire:click="delete" type="button" class="btn btn-primary">Ya</button>
                </div>
            </div> 
        </div>
    </div>


</div>
