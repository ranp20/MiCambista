$(() => {
	// ------------ ANCLAS INTERNAS PARA LAS SECCCIONES
	const linksAnchParent = $("#c-Settings_linksAnchors-m");
	const linksAnch = linksAnchParent.find("li");
	const itemsAnch = $(".cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting");
	const firstLinkAnch = linksAnch.eq(0).data("target").slice(1);

	// MOSTRAR EL PRIMER LINK Y SU SECCIÓN
	linksAnch
		.eq(0)
		.add($(`.cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting[id="${firstLinkAnch}"]`))
		.addClass("active");
	// MOSTRAR SECCIÓN DE ACUERDO AL LINK
	linksAnch.on("click", function(){
		var t = $(this);
		var tindex = t.index();
		var tattribute = t.data("target").slice(1);
		// linksAnch.eq(tindex).add(itemsAnch.eq(tindex)).addClass("active").siblings().removeClass("active");
	  linksAnch
	  	.eq(tindex)
	  	.add($(`.cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting[id="${tattribute}"]`))
	  	.addClass('active')
	  	.siblings()
	  	.removeClass("active");
	});
});

$(document).on("keyup", "input[data-valformat=withspacesforthreenumbers]", function(e){
	let val = e.target.value;
  $(this).val(val.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3'));
});