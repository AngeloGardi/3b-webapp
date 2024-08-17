$(document).ready(function () {
  $("#select").change(function () {
    let htmlCode = "";
    $("select option:selected").each(function () {
      const id = $(this).val();
      $.getJSON(`../brand.php?id=${id}`)
        .done(function (data) {
          htmlCode += `
                            <div class="box-image">
                                <p>${data.productName}</p>
                                <img src = "../assets/images/${data.image}" />
                            </div>
                            <div>${data.title}</div>
                            <div>${data.creationMethod}</div>
                            <div>${data.subTitle}</div>
                            <div>${data.description}</div>
                        `;

          $("#placeholder").html(htmlCode);
        })
        .fail(function () {
          console.log(
            "viewDrinks JS Handler: Server returned an Error, trap this in your PHP Server code"
          );
        });
    });
  });
});
