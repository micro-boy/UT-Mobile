<!DOCTYPE html>
<html>
<head>
    <title>Create a New Loan</title>
</head>
<body>
    <h1>Create a New Loan</h1>
    <form action="{{ route('loan.store') }}" method="POST">
        @csrf
        <label for="amount">Loan Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <br>
        <label for="term">Loan Term (in months):</label>
        <input type="number" id="term" name="term" required>
        <br>
        <label for="interest_rate">Interest Rate (%):</label>
        <input type="number" id="interest_rate" name="interest_rate" step="0.01" required>
        <br>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('loan.index') }}">Back to Home</a>
</body>
</html>
