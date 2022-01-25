<div>

    @if (session()->has('message'))
        {{-- TODO nu este corect, trebuie aflat de ce nu incarca aici js-ul --}}
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="mt-5 flex justify-between">
        <h2 class="text-2xl font-bold">Adaugare reteta la procedura: {{ $procedure->procedure_medical_name }}</h2>
        <div class="text-right">
            <span class="form-control border border-green-400 rounded-md bg-white hover:bg-green-200 focus:outline-none">{{ number_format($procedure->procedure_price,2, '.', '') }} RON</span>
        </div>
    </div>

    <div class="mt-5">

        <table class="table bg-white">
            <thead>
            <tr>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Nume</th>
                {{--<th class="border-b-2 dark:border-dark-5 whitespace-nowrap">CAS</th>--}}
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Discount</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cod</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cantitate</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($inputs as $key => $value)
                <tr class="selectToEmpty_{{$value}} {{(($key % 2 == 0) ? 'bg-gray-200 dark:bg-dark-1' : '')}}">
                    <td class="align-middle border-b dark:border-dark-5 font-bold">{{ $key + 1 }}</td>
                    <td class="align-middle border-b dark:border-dark-5 w-1/4">
                        <div wire:ignore>
                            <select class="form-select form-select-sm" id="add_article_select2_{{$value}}" wire:model="article.{{$value}}" >
                                <option value="">Select Articol</option>
                                @foreach($articles as $article)
                                    <option value="{{ $article->id }}">{{ $article->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    {{--<td class="text-center align-middle border-b dark:border-dark-5">--}}
                        {{--<div class="form-check">--}}
                            {{--<input id="" class="form-check-input" type="checkbox">--}}
                        {{--</div>--}}
                            {{--<input type="checkbox" {{((isset($need_crystalline[$value]) && $need_crystalline[$value] != null) ? 'checked' : '')}} class=""> --}}
                    {{--</td>--}}
                    <td class="align-middle border-b dark:border-dark-5">
                        <div><input disabled type="text" class="form-control form-control-sm" wire:model="article_price.{{ $value }}">
                            @error('article_price.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                    </td>
                    <td class="align-middle border-b dark:border-dark-5">
                        <div><input disabled type="text" class="form-control form-control-sm" wire:model="article_discount.{{ $value }}">
                            @error('article_discount.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                    </td>
                    <td class="align-middle border-b dark:border-dark-5">
                        <div><input disabled type="text" class="form-control form-control-sm" wire:model="article_code.{{ $value }}">
                            @error('article_code.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                    </td>
                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">
                        <div><input type="number" class="form-control form-control-sm" wire:model="article_quantity.{{ $value }}">
                            @error('article_quantity.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                    </td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </td>
                </tr>

                <tr>
                    <td colspan="11" class="align-middle border-b dark:border-dark-5" style="padding: 0;">
                        <div class="text-center">
                            @error('article.'.$value) <p class="my-3">{{ $message }}</p>@enderror
                        </div>
                    </td>
                </tr>

            @endforeach

            <tr class="">
                <td class="align-middle border-b dark:border-dark-5 font-bold">&nbsp;</td>
                <td class="align-middle border-b dark:border-dark-5 w-1/4 text-right font-bold">Total</td>
                <td class="align-middle border-b dark:border-dark-5">
                    <div><input disabled type="text" class="form-control form-control-sm" wire:model="article_total_price"></div>
                </td>
                <td class="align-middle border-b dark:border-dark-5">
                    <div><input disabled type="text" class="form-control form-control-sm" wire:model="article_total_discount"></div>
                </td>
                <td class="align-middle border-b dark:border-dark-5">&nbsp;</td>
                <td class="align-middle border-b dark:border-dark-5">&nbsp;</td>
                <td class="align-middle border-b dark:border-dark-5 text-right">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="11" class="px-0 align-middle border-b dark:border-dark-5">
                    <div class="flex justify-center">
                        <button class="font-bold py-2 px-4 btn btn-primary" wire:click.prevent="add({{$i}})" wire:loading.remove>Add Articol</button>
                        <span class="font-bold text-red-700 py-2 px-4" wire:loading wire:target="add({{$i}})">Adding</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="my-3 flex justify-between">
            <a href="{{ route('lista_proceduri') }}" class="btn btn-primary font-bold py-2 px-4 rounded mt-3">Inapoi</a>
            <button class="btn btn-primary font-bold py-2 px-4 rounded mt-3" type="button" wire:click="store()">Salveaza</button>
        </div>

    </div>

    <script>
        $(document).ready(function () {

            $('#add_article_select2_0').select2();
            $('#add_article_select2_0').on('change', function (e) {
                var item = $('#add_article_select2_0').select2("val");
            @this.set('article.0', item);
            });

            window.addEventListener('reApplySelect2', event => {

                $('#add_article_select2_'+ event.detail.whatSelect).select2();

                $('#add_article_select2_'+ event.detail.whatSelect).on('change', function (e) {
                    var item = $('#add_article_select2_'+ event.detail.whatSelect).select2("val");
                @this.set('article.'+ event.detail.whatSelect, item);
                });
            });

            @foreach ($inputs as $key => $value)
                $('#add_article_select2_{{$value}}').select2();
            @endforeach
        });
    </script>

</div>
