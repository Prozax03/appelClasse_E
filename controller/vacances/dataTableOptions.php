<?php

echo "'ordering': false,
        'columnDefs': [
            { 'type': 'date', 'targets': 0 },
            { 'type': 'date', 'targets': 1 },
            { 'visible': false, 'targets': 3 }
        ],
        'order': [[ 0, 'desc' ]],
        'aoColumns': [
            { mData: 'DATEDEBUT' } ,
            { mData: 'DATEFIN' },
            { mData: 'LIBELLE' },
            { mData: 'ANNEE' }
        ],
        rowGroup: {
            dataSrc: 'ANNEE'
        }";
        
?>