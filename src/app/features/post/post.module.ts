import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PostRoutingModule } from './post-routing.module';
import { PostComponent } from './containers/post/post.component';
import { RouterModule } from '@angular/router';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  imports: [
    PostRoutingModule,
    SharedModule
  ],
  declarations: [PostComponent],
  exports: []
})
export class PostModule { }
