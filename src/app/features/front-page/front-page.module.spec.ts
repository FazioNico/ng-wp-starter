import { FrontPageModule } from './front-page.module';

describe('FrontPageModule', () => {
  let frontPageModule: FrontPageModule;

  beforeEach(() => {
    frontPageModule = new FrontPageModule();
  });

  it('should create an instance', () => {
    expect(frontPageModule).toBeTruthy();
  });
});
