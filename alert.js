/* function showAlert() {
    var result = confirm("Voulez-vous continuer ?");
    if (result) {
        echo "<script>window.location.href='indexLog.php'</script>"
    } else {
        echo "<script>window.location.href='findMeeting.php'</script>"
    }
  } */

function confirmRemove(animalId) {
  if (animalId == 18) {
    window.location.href = 'easterEgg.php'
  }
  else {
    if (confirm("voulez vous vraiment supprimer de la surface de la terre ce petit bonhomme ?")) {
      window.location.href = 'findMatch.php?id=' + animalId
    }
  }
}