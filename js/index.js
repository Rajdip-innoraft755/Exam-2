/**
 * After the document successfully loaded, if user want to see the man of
 * the match name then it used.
 */
$(document).ready(function() {
  $("#show").click(function() {
    $(".man").show();
  })
});


$(document).ready(function() {
  /**
   * After the document successfully loaded,if users try to edit any player
   * then this is used.
   */
  $(".edit").click(function () {
    var id = $(this).attr("id");
    var name = $(".name#name" + id).val();
    var run = $(".run#run" + id).val();
    var balls = $(".balls#balls" + id).val();
    $.ajax({
      url: "/edit.php",
      method: "POST",
      data: {
        id: id,
        name: name,
        run: run,
        balls: balls,
      },
      datatype: "JSON",
      success: function () {
        window.location.reload();
      },
    });
  });

  /**
   * After the document successfully loaded,if users try to delete any player
   * then this is used.
   */
  $(".delete").click(function () {
    $.ajax({
      url: "/delete.php",
      method: "POST",
      data: {
        id: $(this).attr("id"),
      },
      success: function () {
        window.location.reload();
      },
    });
  });
});

