$(() => {
	// ------------ ANCLAS INTERNAS PARA LAS SECCCIONES
	const linksAnchParent = $("#c-Settings_linksAnchors-m");
	const linksAnch = linksAnchParent.find("li");
	const itemsAnch = $(".cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting");
	linksAnch.eq(0).add(itemsAnch.eq(0)).addClass("active");
	linksAnch.on("click", function(){
		var t = $(this);
		var tindex = t.index();
		var tattribute = t.data("target");
		// linksAnch.eq(tindex).add(itemsAnch.eq(tindex)).addClass("active").siblings().removeClass("active");
	  linksAnch
	  	.eq(tindex)
	  	.add($(`.cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting[id="${tattribute}"]`))
	  	.addClass('active')
	  	.siblings()
	  	.removeClass("active");
	});
});