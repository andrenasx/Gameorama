const input_banner_photo = document.querySelector("#input_banner_photo")
const input_profile_photo = document.querySelector("#input_profile_photo")
const banner_button = document.querySelector(".edit_banner_photo")
const profile_button = document.querySelector(".edit_profile_photo")


banner_button.addEventListener("click", () =>{
    input_banner_photo.click()
})

profile_button.addEventListener("click", () =>{
    input_profile_photo.click()
})

input_profile_photo.addEventListener("change", (event) => {
    event.preventDefault()
    preview = document.querySelector("#profile_image")
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = function() {
        URL.revokeObjectURL(preview.src)
    }
})

input_banner_photo.addEventListener("change", (event) => {
    event.preventDefault()
    banner_preview = document.querySelector("#banner_photo_preview")
    banner_preview.style.backgroundImage = "url(" + URL.createObjectURL(event.target.files[0]) +")"
    banner_preview.onload = function() {
        URL.revokeObjectURL(banner_preview.style.background)
    }

})


document.querySelector("#edit_submit_button").addEventListener("click", (event) => {
    event.preventDefault()
    document.querySelector("#edit_form").submit()
})
