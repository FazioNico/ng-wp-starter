import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from '@app/features/blog/containers/home/home.component';

const routes: Routes = [
  {
    path: '',
    children: [
      // main blog page
      {
        path: '',
        component: HomeComponent,
      },
      // first add your custom posttype with desired url path as wordpress setting
      {
        path: 'demos',
        loadChildren: '../democat/democat.module#DemocatModule'
      },
      // then add categoies
      {
        path: '',
        loadChildren: '../category/category.module#CategoryModule'
      },
      // finally add single post
      {
        path: ':cat',
        loadChildren: '../post/post.module#PostModule'
      },
      { path: '**', redirectTo: '404', pathMatch: 'full' },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BlogRoutingModule { }
