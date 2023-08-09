@extends('layouts.base')

@section('content')

    @component('components.inner-section')

        @component('components.title', [
            'title' => 'Contact',
            ])
        @endcomponent

        @component('components.blog-entries')

            @component('components.main-content')

                <form id="form_contacts">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control ">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control ">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="content">Write Message</label>
                            <textarea name="content" id="content" class="form-control " cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>

            @endcomponent

            @component('components.sidebar', [
                'categories' => $categories,
                ])
            @endcomponent

        @endcomponent

    @endcomponent

@endsection

@push('js-contacts')
<script>
    $('#form_contacts').submit(function(event) {
        event.preventDefault();

        let name = $('#name').val();
        let phone = $('#phone').val();
        let email = $('#email').val();
        let content = $('#content').val();

        // Выполняем AJAX-запрос для создания новой записи в базе данных
        $.ajax({
            url: '/contacts/create_message',
            type: 'POST',
            data: {
                name: name,
                phone: phone,
                email: email,
                content: content,
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Обработка успешного ответа от сервера
                // ...
                console.log(response)

            },
            error: function(xhr, status, error) {
                // Обработка ошибки
                // ...
            }
        });
    });

</script>
@endpush

