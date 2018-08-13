import { Component, OnInit, Inject } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { WpApiService } from '@app/shared/services';
import { AppConfig } from '@app/app.module';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  public data$: Observable<any>;
  public posts$: Observable<any>;

  constructor(
    @Inject(AppConfig) public readonly config: any,
    private _wpApi: WpApiService
  ) { }

  ngOnInit() {
    this.data$ = this._wpApi.getData({path: 'pages/' + this.config.home_id, slug: ``}).pipe(
      map(res => (res.length === 1 ) ? res[0] : res)
    );
    this.posts$ = this._wpApi.getData({path: 'posts', slug: ``}).pipe(
      map(res => res .filter(item => item.type === 'post'))
    );
  }

}
