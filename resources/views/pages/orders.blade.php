@extends('layouts.app')

@section('content')
<main class="py-4" id="menus">
    <div class="header">
        <h4>Orders</h4>
        <p id="datetime"></p>
    </div>

    <div class="order-list">
        <div id="myGrid" class="ag-theme-alpine"></div>
    </div>
</main>
@endsection

@section('plugins')
<script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
<link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
<link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">
@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
    let data = @json($data);
    console.log(data);

    // specify the columns
    const columnDefs = [
      { field: "id", name, headerName: "ID", sortable: true, filter: true },
      { field: "order_no", name, headerName: "ORDER NO", sortable: true, filter: true },
      { field: "has_coupon_code", name, headerName: "COUPON", sortable: true, filter: true },
      { field: "status", name, headerName: "STATUS", sortable: true, filter: true }
    ];

    // specify the data
    const rowData = [];
    data.forEach(element => {
        console.log(element);

        rowData.push({
            id: element.id, 
            order_no: element.order_no, 
            has_coupon_code: element.has_coupon_code, 
            status: element.status 
        });
    });

    // let the grid know which columns and what data to use
    const gridOptions = {
      columnDefs: columnDefs,
      rowData: rowData
    };

  // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid');

  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);

</script>
@endsection