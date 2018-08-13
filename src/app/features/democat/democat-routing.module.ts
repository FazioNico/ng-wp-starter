import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DemocatComponent } from '@app/features/democat/containers/democat/democat.component';
import { DemoPostComponent } from '@app/features/democat/containers/demo-post/demo-post.component';

const routes: Routes = [{
  path: '',
  children: [
    {
        path: '',
        component: DemocatComponent,
    },
    {
      path: ':slug',
      component: DemoPostComponent
    }
  ]
}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DemocatRoutingModule { }
