<!DOCTYPE html>
<html>
<head>
    <title>Loan Application Home</title>
</head>
<body>
    <h1>Welcome to the Loan Application</h1>
    <p>This is the home page of the loan application.</p>
    <a href="{{ route('loan.create') }}">Apply for a new loan</a>
    <h2>Loan Details</h2>
    <ul>
        <li><a href="{{ route('loan.show', ['id' => 1]) }}">Loan 1</a></li>
        <li><a href="{{ route('loan.show', ['id' => 2]) }}">Loan 2</a></li>
        <li><a href="{{ route('loan.show', ['id' => 3]) }}">Loan 3</a></li>
    </ul>
</body>
</html>
