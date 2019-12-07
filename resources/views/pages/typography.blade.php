@extends('layouts.app', ['activePage' => 'typography', 'titlePage' => __('Typography')])

@section('content')
@csrf
<div class="content">
  <div class="container">
    <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    StockId
                  </th>
                  <th>
                    Symbol
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Current Price
                  </th>
                  <th>
                    Quantity Owned
                  </th>
                  <th>
                    Buy Stock
                  </th>
                  <th>
                    Sell Stock
                  </th>
                </thead>
                <tbody >
                  @for ($i=0; $i<count($stocks); $i++)
                    <tr>
                      <td>
                        {{ $stocks[$i]->id }}
                      </td>
                      <td>
                        {{ $stocks[$i]->symbol }}
                      </td>
                      <td>
                        {{ $stocks[$i]->name }}
                      </td>
                      <td class="text-center">
                        ${{ $stocks[$i]->price }}
                      </td>
                      <td class="text-center">
                        {{ $stocks[$i]->quantity }}
                      </td>
                      <td>
                        <button data-id="{{ $stocks[$i]->id }}" type="submit" class="btn btn-primary buyModal{{$i}}" data-toggle="modal" data-target="#buyModal{{$i}}">Buy</button>
                      </td>
                      <td>
                        <button data-id="{{ $stocks[$i]->id }}" type="submit" class="btn btn-primary sellModal{{$i}}" data-toggle="modal" data-target="#sellModal{{$i}}">Sell</button>
                      </td>
                    </tr>
                    <div class="modal fade" id="buyModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Buy Stocks</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <h4 class="hidden buyId{{$stocks[$i]->id}}" data-id="{{ $stocks[$i]->stockId }}">{{ $stocks[$i]->stockId }}</h4>
      <h4>
        <b>Company Name:</b> {{ $stocks[$i]->name }}
      </h4>
      <h5>
        <b>Current Price:</b> $<span data-price="{{ $stocks[$i]->price }}" class="buyPrice{{$stocks[$i]->id}}">{{ $stocks[$i]->price }}</span>
      </h5>
      <h5>
        <b>Quantity to buy:</b> <input type="number" name="quantity" class="buyQuantity{{$stocks[$i]->id}}" min="0" max="99999" />
      </h5>
      <h5>
        <b>Available Balance:</b> <input class="balance" type="number" readonly="true" value="{{ $balance }}" />
      </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-id="{{ $stocks[$i]->id }}" class="btn btn-primary buyStock">Buy</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="sellModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sell Stocks</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <h4 class="hidden sellId{{$stocks[$i]->id}}" data-id="{{ $stocks[$i]->stockId }}">{{ $stocks[$i]->stockId }}</h4>
      <h4>
        <b>Company Name:</b> {{ $stocks[$i]->name }}
      </h4>
      <h5>
        <b>Current Price:</b> $<span data-price="{{ $stocks[$i]->price }}" class="sellPrice{{$stocks[$i]->id}}">{{ $stocks[$i]->price }}</span>
      </h5>
      <h5>
        <b>Quantity Owned:</b> <span data-quantity="{{ $stocks[$i]->quantity }}" class="sellOwnQuantity{{ $stocks[$i]->id }}">{{ $stocks[$i]->quantity }}</span>
      </h5>
      <h5>
        <b>Quantity to Sell:</b> <input type="number" name="quantity" class="sellQuantity{{$stocks[$i]->id}}" min="0" max="99999" />
      </h5>
      <h5>
        <b>Available Balance:</b> <input class="balance" type="number" readonly="true" value="{{ $balance }}" />
      </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-id="{{ $stocks[$i]->id }}" class="btn btn-primary sellStock">Sell</button>
      </div>
    </div>
  </div>
</div>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
  </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->

<script>
  $(document).on('click', '.buyModal', function(){
    let id = $(this).data('id');

    console.log(id, 'hey');
  });
    $(document).on('click', '.buyStock', function(){
      var id= $(this).data(id);
      var quantity = $('.buyQuantity' + id.id).val();
      var price = $('.buyPrice' + id.id).data('price');
      var balance = $('.balance').val();
      console.log(parseInt(quantity)*parseInt(price), parseInt(balance));
      if(quantity == ""){
        alert('Please enter a proper quantity!');
        return ;
      }
      else if(parseInt(quantity)*price > parseInt(balance)){
        alert('You do not have enough balance in your account!');
        return ;
      }
      else{
        // send a post to the server with stock details
        $.ajax({
          url: 'buyStock',
          type: "POST",
          data: {
            'id': id.id,
            'quantity': parseInt(quantity),
            'price': parseInt(price),
            'balance': parseInt(balance) - parseInt(quantity)*parseInt(price),
            '_token': $("input[name='_token'").val()
          },
          success: function(data, textStatus, jqXHR) {
              location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
              alert('Error occurred!');
          }

          });
      }
    });


    $(document).on('click', '.sellStock', function(){
      var id= $(this).data(id);
      var quantityOwned = $('.sellOwnQuantity' + id.id).data('quantity');
      var quantity = $('.sellQuantity' + id.id).val();
      var price = $('.sellPrice' + id.id).data('price');
      var balance = $('.balance').val();
      console.log(parseInt(quantity), parseInt(quantityOwned), parseInt(price), parseInt(balance));
      if(quantity == ""){
        alert('Please enter a proper quantity!');
        return ;
      }
      else if(parseInt(quantity) > parseInt(quantityOwned)){
        alert('You do not have enough stocks to sell!');
        return ;
      }
      else{
        // send a post to the server with stock details
        $.ajax({
          url: 'sellStock',
          type: "POST",
          data: {
            'id': id.id,
            'quantity': parseInt(quantity),
            'quantityOwned': parseInt(quantityOwned),
            'price': parseInt(price),
            'balance': parseInt(balance) + parseInt(quantity)*parseInt(price),
            '_token': $("input[name='_token'").val()
          },
          success: function(data, textStatus, jqXHR) {
              location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
              alert('Error occurred!');
          }
          });
      }
    });
</script>
@endsection