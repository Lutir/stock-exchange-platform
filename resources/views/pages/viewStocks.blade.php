@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Icons')])

@section('content')
<div class="content">
    <div class="container" style="min-height: 100vh;">
        {{ Form::open(array('url' => 'search-stock')) }}
        {{ Form::token() }}
            <div class="form-group">
            <label for="">Enter Stock Name</label>
            <input type="text"
                class="form-control" name="name" id="stock" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        {{ Form::close() }}
</div>
<script>

var companies = [
    {
        'logo': 'AAPL',
        'name': 'Apple Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'ABBV',
        'name': 'Abbvie Inc. Common Stock',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'ABT',
        'name': 'Abbott Laboratories',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'ACN',
        'name': 'Accenture Plc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'AGN',
        'name': 'Allergan Plc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'AIG',
        'name': 'American International Group',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'ALL',
        'name': 'Allstate Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'AMGN',
        'name': 'Amgen',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'AMZN',
        'name': 'Amazon.Com Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'AXP',
        'name': 'American Express Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BA',
        'name': 'Boeing Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BAC',
        'name': 'Bank of America Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BIIB',
        'name': 'Biogen Inc Cmn',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BK',
        'name': 'Bank of New York Mellon Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BLK',
        'name': 'Blackrock',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'BMY',
        'name': 'Bristol-Myers Squibb Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'C',
        'name': 'Citigroup Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CAT',
        'name': 'Caterpillar Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CELG',
        'name': 'Celgene Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CL',
        'name': 'Colgate-Palmolive Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CMCSA',
        'name': 'Comcast Corp A',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'COF',
        'name': 'Capital One Financial Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'COP',
        'name': 'Conocophillips',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'COST',
        'name': 'Costco Wholesale',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CSCO',
        'name': 'Cisco Systems Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CVS',
        'name': 'CVS Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'CVX',
        'name': 'Chevron Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'DD',
        'name': 'E.I. Du Pont De Nemours and Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'DHR',
        'name': 'Danaher Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'DIS',
        'name': 'Walt Disney Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'DOW',
        'name': 'Dow Chemical Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'DUK',
        'name': 'Duke Energy Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'EMC',
        'name': 'EMC Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'EMR',
        'name': 'Emerson Electric Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'EXC',
        'name': 'Exelon Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'F',
        'name': 'Ford Motor Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'FB',
        'name': 'Facebook Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'FDX',
        'name': 'Fedex Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'FOX',
        'name': '21St Centry Fox B Cm',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'FOXA',
        'name': '21St Centry Fox A Cm',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GD',
        'name': 'General Dynamics Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GE',
        'name': 'General Electric Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GILD',
        'name': 'Gilead Sciences Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GM',
        'name': 'General Motors Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GOOG',
        'name': 'Alphabet Cl C Cap',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GOOGL',
        'name': 'Alphabet Cl A Cmn',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'GS',
        'name': 'Goldman Sachs Group',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'HAL',
        'name': 'Halliburton Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'HD',
        'name': 'Home Depot',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'HON',
        'name': 'Honeywell International Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'IBM',
        'name': 'International Business Machines',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'INTC',
        'name': 'Intel Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'JNJ',
        'name': 'Johnson & Johnson',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'JPM',
        'name': 'JP Morgan Chase & Co',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'KMI',
        'name': 'Kinder Morgan',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'KO',
        'name': 'Coca-Cola Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'LLY',
        'name': 'Eli Lilly and Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'LMT',
        'name': 'Lockheed Martin Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'LOW',
        'name': 'Lowes Companies',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MA',
        'name': 'Mastercard Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MCD',
        'name': 'McDonalds Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MDLZ',
        'name': 'Mondelez Intl Cmn A',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MDT',
        'name': 'Medtronic Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MET',
        'name': 'Metlife Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MMM',
        'name': '3M Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MO',
        'name': 'Altria Group',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MON',
        'name': 'Monsanto Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MRK',
        'name': 'Merck & Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MS',
        'name': 'Morgan Stanley',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'MSFT',
        'name': 'Microsoft Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'NEE',
        'name': 'Nextera Energy',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'NKE',
        'name': 'Nike Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'ORCL',
        'name': 'Oracle Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'OXY',
        'name': 'Occidental Petroleum Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PCLN',
        'name': 'The Priceli 0ne Gp Cm',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PEP',
        'name': 'Pepsico Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PFE',
        'name': 'Pfizer Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PG',
        'name': 'Procter & Gamble Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PM',
        'name': 'Philip Morris International Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'PYPL',
        'name': 'Paypal Holdings',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'QCOM',
        'name': 'Qualcomm Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'RTN',
        'name': 'Raytheon Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'SBUX',
        'name': 'Starbucks Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'SLB',
        'name': 'Schlumberger N.V.',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'SO',
        'name': 'Southern Company',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'SPG',
        'name': 'Simon Property Group',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'T',
        'name': 'AT&T Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'TGT',
        'name': 'Target Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'TWX',
        'name': 'Time Warner Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'TXN',
        'name': 'Texas Instruments',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'UNH',
        'name': 'Unitedhealth Group Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'UNP',
        'name': 'Union Pacific Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'UPS',
        'name': 'United Parcel Service',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'USB',
        'name': 'U.S. Bancorp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'USD',
        'name': 'Ultra Semiconductors Proshares',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'UTX',
        'name': 'United Technologies Corp',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'V',
        'name': 'Visa Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'VZ',
        'name': 'Verizon Communications Inc',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'WBA',
        'name': 'Walgreens Bts Aln Cm',
        'price': 0,
        'history': [],
    },
    {
        'logo': 'WFC',
        'name': 'Wells Fargo & Compan',
        'price': 0,
        'history': [],
}];
    
        
        let dayData = {
            "date": "",
            "price": 0
        };
    
        let a = [];
        let b = 10000;
        companies.map((company)=>{
            company['price'] = 1000 + b*(Math.random());
        });

        companies.map((c)=>{
            let t = c['price'];
            for(let i = 1388534400; i< 1575158400;){
                let d = new Date(0);
                d.setUTCSeconds(i);
                let date = d.getDate() + '/' + (d.getMonth()+1) + '/' + d.getFullYear()
                let dayData = {
                    "date": date,
                    "price": t
                };
                c['history'].push(dayData);
                t += (((Math.random() > 0.51)?-1:1)*(Math.random()*50)*(1 + Math.random()))/(1 + Math.random());
                i+=86400;
            }
        })


        companies.map((company)=>{
            let data = {
                "name": company['name'],
                "symbol": company['logo'],
                "price": company['price'],
                "description": "A stock (also known as shares or equity) is a type of security that signifies proportionate ownership in the issuing corporation. This entitles the stockholder to that proportion of the corporation's assets and earnings.",
                "_token": $("input[name=_token]").val(),
                "history": company['history']
            }
            $.ajax({
                url: "add-stock",
                type: "post",
                data: data,
                success: function(d) {
                        console.log(d);
                }
            });
        })
</script>
@endsection