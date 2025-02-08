import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';
import 'autolink-js';
import UserCard from 'flarum/forum/components/UserCard';
import User from 'flarum/common/models/User';
import Model from 'flarum/common/Model';
import FeaturedImageButton from "./components/FeaturedImageButton";
app.initializers.add("flarum-featured-image", () => {
    extend(UserCard.prototype, "infoItems", function (items) {
        items.add("add-featured-image", <FeaturedImageButton> </FeaturedImageButton>, -100);
    });
});