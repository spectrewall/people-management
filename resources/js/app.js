import './bootstrap';
import 'datatables.net-dt/css/jquery.dataTables.css';
import DataTable from 'datatables.net-dt';
import Alpine from 'alpinejs';
import jQuery from 'jquery';
import 'jquery-mask-plugin';

window.$ = jQuery;
window.Alpine = Alpine;
Alpine.start();

new DataTable('.datatable', {
    "pageLength": 7,
    "stateSave": false,
    "dom": "ftrip",
    "language": {
        processing: "Aguarde enquanto os dados são carregados ...",
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Nenhum registro correspondente ao critério encontrado",
        infoEmtpy: "",
        info: "Exibindo de _START_ a _END_ de _TOTAL_ registros",
        infoFiltered: "",
        search: "Procurar",
        paginate: {
            first: "Primeiro",
            previous: "Anterior",
            next: "Próximo",
            last: "Último",
        },
    }
});
