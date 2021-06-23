<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $order->title }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /*tr:nth-child(even) {*/
        /*    background-color: #dddddd;*/
        /*}*/
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2">
{{--                 <img src="{{ asset('admin') }}/images/logo.png" width="100" height="100" alt="User" />--}}
                 <img src="https://tzinteriorstudio.com/wp-content/uploads/2020/02/TZ-Logo-Final-02-1.png" width="100" height="100" alt="User" />
            </td>
            <td colspan="2">
                <h4>TZ Interior Studio</h4>
                <p>
                    <strong>Mobile:</strong> 880-2-41040028<br>
                    <strong>Email:</strong> info@tzinteriorstudio.com<br>
                    <strong>Website:</strong> www.tzinteriorstudio.com<br>
                    <strong>Address:</strong> House #48, Flat #B-2, Road #25, Banani, Dhaka.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h4>INVOICE</h4>
                <p>
                    <strong>Project Name:</strong> {{ $order->project->name }}<br>
                    <strong>Owner Name:</strong> {{ $order->project->owner }}<br>
                    <strong>Address:</strong> {{ $order->project->location }}<br>
                </p>
            </td>
            <td colspan="2">
                <p>
                    <strong>Requisition Number:</strong> {{ $order->requisition_no }}<br>
                    <strong>Requisition Date:</strong> {{ \Carbon\Carbon::parse($order->needed_date)->format('d/m/Y')}}<br>
                    <strong>Order Number:</strong> {{ $order->po_no }}<br>
                    <strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td>{{ $order->title }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->total_price }}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4">Basic Information</td>
        </tr>
        <tr>
            <td colspan="2">Country of Origin: {{ $order->requisitionCountry->name }}</th>
            <td colspan="2">Manufacturer: {{ $order->manufacturer }}</td>
        </tr>
        <tr>
            <td colspan="2">Purchase Order Type: {{ $order->requisition_type }}</td>
            <td colspan="2">Category: {{ $order->requisitionCategory->name }}</td>
        </tr>
        <tr>
            <td>Supervisor: {{ $order->worker->name }}</td>
            <td colspan="3">Note: {{ $order->description }}</td>
        </tr>
    </table>
</body>
</html>
