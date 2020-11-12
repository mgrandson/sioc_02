@extends('layouts.template')

@section('content')

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-dark">
                Zapato {{ $item->style }} Para {{ $item->gender }} {{ $item->size }}.
            </h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="p-2">
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{ $oferta->id }}" readonly>

                        <div class="form-group row">

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="file-loading">
                                    <input type="file" id="photos" name="file[]" multiple class="file"
                                        data-overwrite-initial="false" data-min-file-count="2"
                                        data-preview-file-type="text">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<!--- FOR UPLOAD PHOTOS ---->
<script>
    var pics = new Array();
    var fotos= {!!json_encode($item->photos()->get())!!}
    //console.log(fotos);
    var index = fotos.length;
    var i;
    var contador = 0;
    var showUploadBotton = true, showBrowseBotton = true;

    for (i = 0; i < fotos.length; i++) {
        pics.push(window.location.origin+"/"+fotos[i]['path']);
        contador +=1;
    }
    fotos.forEach(element => console.log(element)); //TEST
    console.log(contador); //TEST

    if(contador>=4){
        showUploadBotton = false;
        showBrowseBotton = false;
    }

    $("#photos").fileinput({

        theme: 'fas',
        language: 'es',
        uploadUrl: '/image-submit',
        deleteUrl: '/image-delete',
        uploadAsync: false,
        showRemove: false,
        showUpload: showUploadBotton,
        showBrowse: showBrowseBotton,
        uploadExtraData: function() {
            //alert("cargar");
            return {
                _token: $("input[name='_token']").val(),
                itemId: {!!json_encode($item->id)!!},
                offerId: {!!json_encode($oferta->id)!!},
            };
        },
        deleteExtraData: function() {
            //alert("eliminar");
            return {
                _token: $("input[name='_token']").val(),
                itemId: {!!json_encode($item->id)!!},
                offerId: {!!json_encode($oferta->id)!!},

            };
        },
        initialPreview: pics, //Vector de urls de las imagenes.
        initialPreviewAsData: true,
        initialPreviewConfig: [
            @foreach($item->photos()->get() as $f)
                {caption: {!!json_encode($f->filename)!!}, filename: {!!json_encode($f->filename)!!}, downloadUrl: {!!json_encode(asset($f->path))!!}, size: 930321, width: "120px", key: {!!json_encode($f->id)!!} },
            @endforeach
        ],
        allowedFileExtensions: ['jpg', 'png', 'jpeg'],
        overwriteInitial: false,
        maxFileSize: 4000,
        maxFilesNum: 4,
        ajaxDeleteSettings: {
            type: 'DELETE' // This should override the ajax as $.ajax({ type: 'DELETE' })
        },
        slugCallback: function(filename) {

            return filename.replace('(', '_').replace(']', '_');
        }
    }).on('filebeforedelete', function() {
        return new Promise(function(resolve, reject) {
            $.confirm({
                title: 'Confirmación.',
                content: '¿Realmente deseea eliminar este archivo?',
                type: 'red',
                buttons: {
                    ok: {
                        btnClass: 'btn-primary text-white',
                        keys: ['enter'],
                        action: function(){
                            resolve();
                        }
                    },
                    cancel: function(){
                        $.alert('El archivo no será borrado.');
                    }
                }
            });
        });
    }).on('filedeleted', function() {

        setTimeout(function() {
            $.alert('El archivo se ha eliminado.');
        }, 900);

        setTimeout(function() {
            location.reload(true);
        }, 3000);
    });

    $('#photos').on('change', function(event) {
    //$('#photos').fileinput('clear');
    //$('#photos').fileinput('reset');
    //$('#photos').fileinput('refresh');
});
</script>

@endsection
