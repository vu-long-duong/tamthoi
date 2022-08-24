<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <form action="" method="get">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" id="timkiem" class="form-control" name="key" placeholder="Find user,admin,film...." onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
            </form>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1" aria-hidden="true"></i>                       
                        <span class="d-sm-inline d-none">{{Auth()->user()->username}}</span>                        
                    </a>

                </li>


            </ul>
        </div>
    </div>


</nav>
<script type="text/javascript">
    $(document).ready(function() {

        $('#timkiem').keyup(function() {
            $('#result').html('');
            var search = $('#timkiem').val();
            if (search != '') {
                $('#result').css('display', 'inherit');
                var expression = new RegExp(search, "i");
                $.getJSON('/json/movies.json', function(data) {
                    $.each(data, function(key, value) {
                        if (value.title.search(expression) != -1) {
                            $('#result').append('<li class="list-group-item" style="cursor:pointer"><img height="40" width="40" src="/uploads/movie/' + value.image + '">' + value.title + '<br/> | <span>' + value.description + '</span></li>');
                        }
                    });
                })
            } else {
                $('#result').css('display', 'none');
            }
        })



        $('#result').on('click', 'li', function() {
            var click_text = $(this).text().split('|');

            $('#timkiem').val($.trim(click_text[0]));

            $("#result").html('');
            $('#result').css('display', 'none');
        });

    })
</script>