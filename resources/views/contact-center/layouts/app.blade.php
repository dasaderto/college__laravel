<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function initBody() {
            
        };
    </script>
</head>
<body>
    <script>initBody();</script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 0.22rem;">МФУ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.program.index')}}">Программы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.program2.index')}}">Программы2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.program3.index')}}">Программы3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.period.index')}}">Сроки поступления</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Прочее... <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.period_transfer_recovery.index')}}">Сроки перевода|восстановления</a>
                                <a class="dropdown-item" href="{{route('admin.document_transfer_recovery.index')}}">Документы для перевода|восстановления</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Таксономии <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.faculty.index')}}">Факультеты</a>
                                <a class="dropdown-item" href="{{route('admin.direction.index')}}">Направления</a>
                                <a class="dropdown-item" href="{{route('admin.degree.index')}}">Степени</a>
                                <a class="dropdown-item" href="{{route('admin.form.index')}}">Формы</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Парсер <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.parse_programs.index')}}">Программы</a>
                                <a class="dropdown-item" href="{{route('admin.parse_periods.index')}}">Сроки поступления</a>
                                <a class="dropdown-item" href="{{route('admin.parse_documents_transfer_recovery.index')}}">Документы перевода/восстановления</a>
                                <a class="dropdown-item" href="{{route('admin.parse_periods_transfer_recovery.index')}}">Сроки перевода/восстановления</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Выход
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrapper">
            <header id="header">
                <nav>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="">Контакты</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Бакалавриат</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Магистратура</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Астпирантура</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Второе высшее</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Колледж</a></li>
                        <li class="nav-item"><a class="nav-link" href="">ДПО</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Лицей</a></li>
                    </ul>
                </nav>
                <div class="c_card-info">
                    <span class="header">График работы<br>приемной комиссии:<br></span>
                    Будни: с 9 до 17:30<br>
                    Выходные: с 10 до 15
                </div>
            </header>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        
    </div>
</body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script>
        /*$(document).ready(function(){
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('json.get_programs')}}",
                type: 'POST',
                data: {
                    _token: token,
                },
                success: function(res){
                }
            });
        });*/
        $(document).ready(function(){
            function filter_tax(tax) {
                $(tax).change(function(){
                     reset_filter = false;
                     checked_forms = false;
                     forms = [];
                     degree = $('select[name="degree"').val();
                     direction = $('select[name="direction"').val();
                     faculty = $('select[name="faculty"').val();
                    $('.filter_program_form').each(function(ind, el){
                        if($(el).prop('checked')) {
                            checked_forms = true;
                            forms.push($(el).attr('id'))
                        }
                    });
                    if(!degree && !direction && !faculty && !checked_forms) reset_filter = true;
                    console.log('reset_filter:'+reset_filter+' degree:'+degree +' direction:'+direction+' faculty:'+faculty+' forms:'+forms);
                    $('.program_item').each(function(ind, el){
                        var show = true;
                        if(reset_filter) {
                            $(el).show();
                            return;
                        }
                        if(degree){
                            if($(el).hasClass('degree-'+degree)) show = true;
                            else show = false;
                        }
                        if(direction){
                            if($(el).hasClass('direction-'+direction) && show === true) show = true;
                            else show = false;
                        }
                        if(faculty){
                            if($(el).hasClass('faculty-'+faculty) && show === true) show = true;
                            else show = false;
                        }
                        if(checked_forms && forms.length > 0){
                            forms.forEach(function(item, i){
                                if($(el).hasClass(item) && show === true) show = true;
                                else show = false;
                            })
                        }
                        /*$('.filter_program_form').each(function(ind2, el2){
                            //if($(el2))
                        });*/
                        if(show === true) $(el).show();
                        else $(el).hide()
                    });
                });
            }
            filter_tax('select[name="degree"');
            filter_tax('select[name="direction"');
            filter_tax('select[name="faculty"');
            filter_tax('.filter_program_form');
            
            $('.multiple_select__data__item').on('click', function(){
                var id = parseInt($(this).attr('data-id'));
                var name = $(this).text();
                var input = $(this).closest('.multiple_select').find('.multiple_select__input');
                var show = $(this).closest('.multiple_select').find('.multiple_select__show');
                var inval = JSON.parse(input.val());
                if(inval.indexOf(id) !== -1) return;
                inval.push(id);
                input.val(JSON.stringify(inval))
                show.append(' <span data-id="'+id+'" class="multiple_select__show__item badge badge-secondary">'+name+' <i class="fas fa-times-circle"></i></span>');
            });
            $('.multiple_select__show').on('click', '.multiple_select__show__item i', function(){
                var el = $(this).parent();
                var id = parseInt(el.attr('data-id'));
                var input = el.closest('.multiple_select').find('.multiple_select__input');
                var data = el.closest('.multiple_select').find('.multiple_select__data__item');
                var inval = JSON.parse(input.val());
                inval.splice(inval.indexOf(id), inval.indexOf(id)+1);
                input.val(JSON.stringify(inval))
                el.remove();
            });
            $('.update_form__show').on('click', function(){
                var form = $('.update_form');
                var degrees     = JSON.parse(form.find('input[name="degrees"]').val());
                var directions  = JSON.parse(form.find('input[name="directions"]').val());
                var faculties   = JSON.parse(form.find('input[name="faculties"]').val());
                var forms       = JSON.parse(form.find('input[name="forms"]').val());
                
                form.find('button[type="submit"]').show();
                $('.program_item').each(function(ind, el){
                    console.log(ind);
                    var id = $(el).attr('data-id');
                    $(el).append('<input type="hidden" name="data['+ind+'][id]" value="'+id+'">')
                    mount_tax_select('degree', ind, el, degrees);
                    mount_tax_select('direction', ind, el, directions);
                    mount_tax_select('faculty', ind, el, faculties);
                });
            });
            $('.add_input').on('click', function(){
                var input = $(this).parent().find('input').last().clone();
                input = $(input).val('');
                $(this).parent().append(input);
            });
            $('.add_textarea').on('click', function(){
                var textarea = $(this).parent().find('textarea').last().clone();
                textarea = $(textarea).html('');
                $(this).parent().append(textarea);
            });
            $('.add_form-row').on('click', function(){
                var fr_s = $(this).parent().parent().find('.add_form-row__example');
                var fr_ex = fr_s.last().clone();
                var l = fr_s.length;
                fr_ex.find('.add_form-row__el').each(function(ind, el){
                    var n = $(el).attr('data-name').replace(/{ind}/, l);
                    $(el).attr('name', n);
                });
                $(this).parent().parent().append(fr_ex);
            });
        });
        function mount_tax_select(taxname, ind, el, tax_data){
            var id = $(el).attr('data-id');
            var tax = $(el).find('.'+taxname);
            var tax_id = parseInt(tax.attr('data-id'));
            var tax_select = '<select name="data['+ind+']['+taxname+']" class="custom-select">';
            for(var key in tax_data){
                var selected = (tax_id === parseInt(key)) ? 'selected' : '';
                tax_select += '<option '+selected+' value="'+key+'">'+tax_data[key]+'</option>';
            };
            tax_select += '</select>';
            tax.html(tax_select);
        };
    </script>
</html>
