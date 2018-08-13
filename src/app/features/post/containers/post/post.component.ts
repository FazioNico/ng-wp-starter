import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Location } from '@angular/common';
import { Observable } from 'rxjs';
import { map, tap } from 'rxjs/operators';
import { WpApiService } from '@app/shared/services';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.scss']
})
export class PostComponent implements OnInit {

  public data$: Observable<any>;

  constructor(
    private _location: Location,
    private _router: Router,
    private _wpApi: WpApiService) { }

  ngOnInit() {
    this.data$ = this._wpApi.getData({path: 'posts', slug: `slug=${this._router.url.split('/').reverse()[0]}`}).pipe(
      map(res => (res.length === 1 ) ? res[0] : res),
      tap(data => (!data.type) ? window.location.href = '404' : null)
    );
  }

}
