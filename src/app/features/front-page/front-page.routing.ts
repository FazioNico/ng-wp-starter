import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FrontPageComponent } from './containers/front-page/front-page.component';

const routes: Routes = [{
  path: '',
  component: FrontPageComponent,
  children: []
}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class FrontPageRoutingModule { }
