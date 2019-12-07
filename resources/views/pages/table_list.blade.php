@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">My Stocks</h4>
            <p class="card-category"> My currently owned stocks</p>
          </div>
          @if(gettype($myStocks) != "string")
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th onclick="sortTable(0)">
                    ID
                  </th>
                  <th onclick="sortTable(1)">
                    Symbol
                  </th>
                  <th onclick="sortTable(2)">
                    Name
                  </th>
                  <th onclick="sortTable(3)">
                    Current Price
                  </th>
                  <th onclick="sortTable(4)">
                    Quantity
                  </th>
                </thead>
                <tbody class="sort-items">
                <?php $count = 1; ?>

                  @for ($i=0; $i<count($myStocks); $i++)
                    @if($myStocks[$i]->quantity != 0)
                      <tr>
                        <td>
                          {{ $count }}
                          <?php $count++; ?>
                        </td>
                        <td>
                          {{ $myStocks[$i]->symbol }}
                        </td>
                        <td>
                          {{ $myStocks[$i]->name }}
                        </td>
                        <td>
                          {{ $myStocks[$i]->price }}
                        </td>
                        <td>
                          {{ $myStocks[$i]->quantity }}
                        </td>
                        <td>

                        </td>
                      </tr>
                    @endif
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          @else
          <h3 class="text-center">
            {{ $myStocks }}
          </h3>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function sortTable(n){
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = $('.sort-items');
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.find('tr');
                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];
                
                    if(n == 3 || n == 0){
                        if (dir == "asc") {
                            if (parseInt(x.innerHTML.toLowerCase()) > parseInt(y.innerHTML.toLowerCase())) {
                            shouldSwitch = true;
                            break;
                            }
                        } 
                        else if (dir == "desc") {
                            if (parseInt(x.innerHTML.toLowerCase()) < parseInt(y.innerHTML.toLowerCase())) {
                            shouldSwitch = true;
                            break;
                            }
                        }
                    }
                    else{
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                            }
                        } 
                        else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                            }
                        }
                    }
                    
                }
                if (shouldSwitch) {
               
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
                } else {

                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
        }
    </script>
@endsection