<!-- resources/views/weather/form.blade.php -->

<form method="POST" action="/weather">
    @csrf
    <label for="location">Enter Location:</label>
    <input type="text" id="location" name="location" required>
    <button type="submit">Get Weather</button>
</form>
