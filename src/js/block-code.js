window.onload = function () {

	const lineWidth = 560;
	const windowWidth = window.innerWidth; // Get window width.
	const blockCodeObj = document.querySelectorAll(".code-toolbar"); // Get all code block

	let i; // For counting.

	// Only when bigger windows.
	if (windowWidth >= lineWidth) {

		// Go through object of all blocks
		for (i = 0; i < blockCodeObj.length; i++) {

			// Only when code block is big enough.
			if (blockCodeObj[i].offsetWidth > lineWidth) {

				// blockCodeObj[i].style.width = "100%";
				blockCodeObj[i].classList.toggle("full-width");

			}
		}
	}
}

