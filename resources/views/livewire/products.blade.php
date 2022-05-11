<div>
    <button type="button" class="btn btn-primary">Add Product</button>
    {{-- @dd($products) --}}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Article</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
                <tr wire:click='showModal'>
                    <td scope="row">{{ $key++ }}</td>
                    <td>{{ $item->article }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status == 'available' ? 'Доступен' : 'Недоступен' }}</td>
                    {{-- @dd($item) --}}
                    <td>Color:{{ $item->data['color'] }} <br>
                        Size:{{ $item->data['size'] }} <br>
                        MadeIn:{{ $item->data['make'] }}
                    </td>
                    <td><button type="button" class="btn-success" wire:click='showModal'><i class="icon ni ni-pen2"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($ModalUp)
        <div class="text-left modal fade show" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            style="padding-right: 15px; display: block;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">Добавление/Изменение/Удаление </h4>
                        <button type="button" class="close" wire:click='closeModal'>
                            <span aria-hidden="true">Г—</span>
                        </button>
                    </div>
                    <form wire:submit.prevent='store'>
                        Modal
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
