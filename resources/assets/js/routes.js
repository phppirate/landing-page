import Route from "laravuejs-router";
import RolesIndex from "./controllers/RolesController/index.vue";
import PermissionsIndex from "./controllers/PermissionsController/index.vue";
import UsersIndex from "./controllers/UsersController/index.vue";
import UsersCreate from "./controllers/UsersController/create.vue";
import UsersShow from "./controllers/UsersController/show.vue";

Route.make('/roles', RolesIndex);
Route.make('/permissions', PermissionsIndex);
Route.make('/users', UsersIndex);
Route.make('/users/:userId', UsersShow);
Route.make('/users/create', UsersCreate);

export default Route.all();
