import Route from "laravuejs-router";
import RolesIndex from "./controllers/RolesController/index.vue";
import PermissionsIndex from "./controllers/PermissionsController/index.vue";
import UsersIndex from "./controllers/UsersController/index.vue";
import UsersCreate from "./controllers/UsersController/create.vue";
import UsersShow from "./controllers/UsersController/show.vue";

import SignUpIndex from "./controllers/SignUpsController/index.vue";
import SignUpShow from "./controllers/SignUpsController/show.vue";

import TrackableLinksIndex from "./controllers/TrackableLinksController/index.vue";
import TrackableLinksShow from "./controllers/TrackableLinksController/show.vue";

Route.make('/roles', RolesIndex);
Route.make('/permissions', PermissionsIndex);
Route.make('/users', UsersIndex);
Route.make('/users/:userId', UsersShow);
Route.make('/users/create', UsersCreate);

Route.make('/sign-ups', SignUpIndex);
Route.make('/sign-ups/:signUpId', SignUpShow);

Route.make('/trackable-links', TrackableLinksIndex);
Route.make('/trackable-links/:trackableLinkId', TrackableLinksShow);



export default Route.all();
