/**
 * 基準測試腳本
 *
 * 執行指令：
 *   - PowerShell: cat get-ping.js | docker run --rm -i grafana/k6 run -
 *   - WSL: k6 run get-ping.js
 */
import http from 'k6/http';
import { check } from 'k6';

export const options = {
  vus: 3100,
  duration: '30s',
  // iterations: 10000,
  summaryTimeUnit: 'ms'
  // thresholds: {
  //   // 期望在整個測試執行過程中，錯誤率必須低於 5%
  //   http_req_failed: ["rate < 0.05"],
  //   // 平均請求必須在 300ms 內完成，90% 的請求必須在 200ms 內完成
  //   http_req_duration: ["avg < 300", "p(90) < 200"],
  // }
};

/**
 * k6 run -q -e TEST_HOST=https://laravel-o5sdmowv6q-de.a.run.app/api/ping get-ping.js
 * k6 run -q -e TEST_HOST=https://yii-o5sdmowv6q-de.a.run.app/ping get-ping.js
 * k6 run -q -e TEST_HOST=https://app-o5sdmowv6q-de.a.run.app/api/ping get-ping.js
 * k6 run -q -e TEST_HOST=https://pure-o5sdmowv6q-de.a.run.app get-ping.js
 */
export default function () {
  const res = http.get(__ENV.TEST_HOST);

  check(res, {
    'HTTP Code was 200': (r) => r.status === 200,
    'Request status was pong': (r) => r.json().status === 'pong',
  });
}