<form action="{{ url('charge') }}" method="post">
    @csrf
    <input type="text" name="amount" value="10.00" />
    <input type="submit" name="submit" value="Pay Now" />
</form>
