<!DOCTYPE html>
<html>
<body>

<form>
  Select your favorite fruit:
  <select id="mySelect">
    <option value="apple">Apple</option>
    <option value="orange">Orange</option>
    <option value="pineapple">Pineapple</option>
    <option value="banana">Banana</option>
  </select>
</form>

<p>Click the button to change the selected fruit to banana.</p>

<button type="button" onclick="myFunction()">Try it</button>

<script>
function myFunction() {
  alert(document.getElementById("mySelect").value);
}
</script>

</body>
</html>
