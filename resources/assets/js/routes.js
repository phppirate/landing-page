import Route from "laravuejs-router";
import RolesIndex from "./controllers/RolesController/index.vue";
import PermissionsIndex from "./controllers/PermissionsController/index.vue";

Route.make('/roles', RolesIndex);
Route.make('/permissions', PermissionsIndex);

export default Route.all();
