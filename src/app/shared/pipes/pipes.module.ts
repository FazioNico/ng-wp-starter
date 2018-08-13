import { NgModule } from '@angular/core';
import { SafeHtmlPipe } from './safe-html/safe-html.pipe';

@NgModule({
  imports: [
  ],
  declarations: [
    SafeHtmlPipe
  ],
  exports: [
    SafeHtmlPipe
  ]
})
export class PipesModule {}
