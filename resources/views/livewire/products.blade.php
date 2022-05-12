<div>
    <button type="button" class="btn btn-primary" wire:click='showModal''>Add Product</button>
    {{-- @dd($products) --}}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Article</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
            <tr wire:click=' showModal({{ $item->id }})'>
        <td scope="row">{{ $key++ }}</td>
        <td>{{ $item->article }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->status == 'available' ? 'Доступен' : 'Недоступен' }}</td>
        {{-- @dd($item) --}}
        <td>Color:{{ $item->data['color'] }} <br>
            Size:{{ $item->data['size'] }} <br>
            MadeIn:{{ $item->data['make'] }}
        </td>
        {{-- <td><button type="button" class="btn-success" wire:click='showModal({{ $item->id }})'><i
                    class="icon ni ni-pen2"></i></button></td> --}}
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
                        @if(config('product.role')=='Admin')
                        <button type="button" class="btn btn-success" wire:click='EditProduct'><i
                                class="icon ni ni-pen2"></i></button>
                        <button type="button" class="btn btn-danger" wire:click='delete'><i
                                class="icon ni ni-trash"></i></button>
                        @endif
                        <button type="button" class="close" wire:click='closeModal'>
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <form wire:submit.prevent='store'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Article:*
                                    @error('product.article')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                    @enderror</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" wire:model='product.article'
                                        {{ $ProductEdit ? '' :'disabled' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Name:*
                                    @error('product.name')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                    @enderror</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" wire:model='product.name' {{
                                        $ProductEdit ? '' :'disabled' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Status:*
                                    @error('product.status')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                    @enderror</label>
                                <div class="form-control-wrap">
                                    <select type="text" class="form-control" id="default-01" wire:model='product.status'
                                        {{ $ProductEdit ? '' :'disabled' }}>
                                        <option value="unavailable">Недоступен</option>
                                        <option value="available">Доступен</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Данные:*
                                    @error('product.data')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                    @enderror</label>
                                <div class="row">
                                    <div class="form-control-wrap col-md-4">
                                        <label for="default-01">Цвет</label>
                                        <input type="text" class="form-control" id="default-01"
                                            wire:model='product.data.color' {{ $ProductEdit ? '' :'disabled' }}>
                                    </div>
                                    <div class="form-control-wrap col-md-4">
                                        <label for="default-02">Размер</label>
                                        <input type="text" class="form-control" id="default-02"
                                            wire:model='product.data.size' {{ $ProductEdit ? '' :'disabled' }}>
                                    </div>
                                    <div class="form-control-wrap col-md-4">
                                        <label for="default-02">Производитель</label>
                                        <input type="text" class="form-control" id="default-03"
                                            wire:model='product.data.make' {{ $ProductEdit ? '' :'disabled' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-action">
                        <button type="button" class="btn grey btn-success" wire:click='store' {{ $ProductEdit ? ''
                            :'disabled' }}>Сохранит</button>
                        <button type="button" class="btn grey btn-danger" wire:click='closeModal'>Закрыт</button>
                        {{-- <button type="submit" class="btn btn-outline-primary">{{ __('config.add') }}</button> --}}
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
