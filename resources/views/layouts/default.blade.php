@extends ('adminlte::page')
@section ('plugins.Sweetalert2',true)
@section('js')
<script>
    function ConfirmaExclusao(id) {
        swal.fire({
            title: 'Confirma a Exclusão?',
            text: 'Esta ação não poderá ser revertida',
            type: 'warning',
            showCancelButton: true,
            confirmButtonCollor: '#3085d6',
            cancelButtonCollor: '#b33',
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false,
        }).then(function(isConfirm) {
            if (isConfirm.value) {
                $.get('/' + @yield('table-delete') + '/' + id + '/destroy', function(data) {
                    //sucess data

                    console.log(data);
                    if(data.status == 200){
                    swal.fire(
                        'Deletado',
                        'Exclusão Cofirmada.',
                        'Success'
                    ).then(function() {
                        window.location.reload();
                    });
                }
                    else
                    swal.fire(
                        'Erro',
                        'Ocorreram erros na exclusão. Entre em contato com o suporte.',
                        'error'
                    );
                });
            }
        })
    }
</script>