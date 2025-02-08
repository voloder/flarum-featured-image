import app from 'flarum/forum/app';

export default class FeaturedImageButton {
    view() {
        return (
            <button className="Button" type="button" name="add-featured-image" onclick={this.uploadImage}>
                <span className="Button-label">Select Featured Image...</span>
            </button>
        );
    }

    uploadImage() {
        let formData = new FormData();

        formData.append("featuredImage", document.querySelector("input[type=file]").files[0]);

        fetch(app.forum.attribute('apiUrl')  + "/featured-image", {
            method: "POST",
            body: formData,
            credentials: "same-origin"
        })

        .then(response => response.json())
    }
}