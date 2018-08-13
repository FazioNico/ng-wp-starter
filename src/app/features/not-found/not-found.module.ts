import { NgModule } from '@angular/core';

import { NotFoundRoutingModule } from './not-found-routing.module';
import { SharedModule } from '@app/shared/shared.module';
import { NotFoundComponent } from '@app/features/not-found/containers/not-found/not-found.component';

@NgModule({
  imports: [
    SharedModule,
    NotFoundRoutingModule
  ],
  declarations: [NotFoundComponent]
})
export class NotFoundModule { }
